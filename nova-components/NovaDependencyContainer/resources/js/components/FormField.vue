<template>
    <div v-if="dependenciesSatisfied">
        <div v-for="childField in field.fields">
            <component
                :is="'form-' + childField.component"
                :errors="errors"
                :resource-id="resourceId"
                :resource-name="resourceName"
                :field="childField"
                :ref="'field-' + childField.attribute + childField.name"
                :show-help-text="childField.helpText != null"
            />
        </div>
    </div>
</template>

<script>

import {DependentFormField, HandlesValidationErrors} from 'laravel-nova'
import {walk} from "../utils";

export default {
    mixins: [DependentFormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    mounted() {
        this.updateDependencyStatus();
        var that = this;
        document.querySelector('[data-testid="categories-select"]').addEventListener('change', function (e) {
            fetch( that.getFieldsRoute(e.target.value,that.resourceId)).then(response => response.json()).then(data => {
                that.field.fields = data;
                that.dependenciesSatisfied = !that.dependenciesSatisfied;
                that.$nextTick(() => {
                    that.dependenciesSatisfied = !that.dependenciesSatisfied;
                });
                that.$forceUpdate();
            });
        });

        setTimeout(function () {
            const category_id = document.querySelector('[data-testid="categories-select"]').selectedOptions[0].value;
            fetch(that.getFieldsRoute(category_id,that.resourceId)).then(response => response.json()).then(data => {
                that.field.fields = data;
            });
        }, 1000);

    },

    data() {
        return {
            dependencyValues: {},
            dependenciesSatisfied: false,
        }
    },

    methods: {

        // @todo: not maintainable, move to factory
        findWatchableComponentAttribute(component) {
            let attribute;
            switch (component.field.component) {
                case 'belongs-to-many-field':
                case 'belongs-to-field':
                    attribute = 'selectedResource';
                    break;
                case 'morph-to-field':
                    attribute = 'fieldTypeName';
                    break;
                default:
                    attribute = 'value';
            }
            return attribute;
        },

        componentIsDependency(component) {
            if (component.field === undefined) {
                return false;
            }

            for (let dependency of this.field.dependencies) {
                // #93 compatability with flexible-content, which adds a generated attribute for each field
                if (component.field.attribute === (this.field.attribute + dependency.field)) {
                    return true;
                }
            }

            return false;
        },

        // @todo: align this method with the responsibility of updating the dependency, not verifying the dependency "values"
        updateDependencyStatus() {
            for (let dependency of this.field.dependencies) {

                // #93 compatability with flexible-content, which adds a generated attribute for each field
                let dependencyValue = this.dependencyValues[(this.field.attribute + dependency.field)];
                if (dependency.hasOwnProperty('empty') && !dependencyValue) {
                    this.dependenciesSatisfied = true;
                    return;
                }

                if (dependency.hasOwnProperty('notEmpty') && dependencyValue) {
                    this.dependenciesSatisfied = true;
                    return;
                }

                if (dependency.hasOwnProperty('nullOrZero') && 1 < [undefined, null, 0, '0'].indexOf(dependencyValue)) {
                    this.dependenciesSatisfied = true;
                    return;
                }

                if (dependency.hasOwnProperty('not') && dependencyValue != dependency.not) {
                    this.dependenciesSatisfied = true;
                    return;
                }

                if (dependency.hasOwnProperty('in') && dependency.in.includes(dependencyValue)) {
                    this.dependenciesSatisfied = true;
                    return;
                }

                if (dependency.hasOwnProperty('notin') && !dependency.notin.includes(dependencyValue)) {
                    this.dependenciesSatisfied = true;
                    return;
                }

                if (dependency.hasOwnProperty('value') && dependencyValue == dependency.value) {
                    this.dependenciesSatisfied = true;
                    return;
                }
            }

            this.dependenciesSatisfied = false;
        },

        fill(formData) {
            if (this.dependenciesSatisfied) {
                _.each(this.field.fields, field => {
                    if (field.fill) {
                        field.fill(formData)
                    }
                })
            }
        },
        getFieldsRoute(categoryId,productId = null){
            console.log(productId);
            let url = this.field.routeName.toString().replace('category_id',categoryId);
            if(productId){
                url += `?product_id=${productId}`;
            }
            return url;
        }
    },
}
</script>
