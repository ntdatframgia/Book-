<template>
	<div>
		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <div class="box-header with-border">
                <div v-if="message" class="alert alert-success alert-dismissible" >
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ message }} </h4>                
                </div>
            </div>
            <!-- /.box-header -->   
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                    <label>Select</label>
                    <select name="parentId" class="form-control" v-model="parentId" v-html="category">                        
                    </select>
                </div>
                <div class="form-group" v-bind:class="{ 'form-group--error': $v.name.$error }">
                  <label for="CategoryName">Category Name</label>   
                  <input type="text" v-model="name"  v-model.trim="name" @blur="$v.name.$touch()" class="form-control" id="CategoryName" placeholder="Category Name">
                  <span class="form-group__message" v-if="!$v.name.required">Field is required</span>
                  <span class="form-group__message" v-if="!$v.name.minLength">Name must have at least {{$v.name.$params.minLength.min}} letters.</span>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button @click.prevent="StoreCate" :disabled="$v.name.$invalid" type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
	</div>
</template>
<script>
    import { required, minLength } from 'vuelidate/lib/validators';

    export default {
        data: function() {
            return {
                errors: [],
                parentId : 0,
                name: '',
                age: '',
                category: '',
            }
        },

        validations: {
            name: {
                required,
                minLength: minLength(4),
            }
        },

        beforeMount: function () {
             this.category = this.ListCate();   
        },

        methods: {
            StoreCate: function (event) {
                axios.post('./api/category', {
                    parent_id: this.parentId,
                    name: this.name
                })
                .then((response) => {
                    this.message = null;
                    if(!this.message) {
                       this.message = 'Category Add Succesfully!';  
                    }
                    console.log(response.data);
                });
                event.preventDefault();
            },

            ListCate: function () {
                let that = this;
                axios.get('./api/category')
                .then(function (response) {
                    that.category = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                })
            }
        }
    }
</script>
