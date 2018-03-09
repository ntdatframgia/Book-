<template>
	<div>
		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <div class="box-header with-border">
                <div v-if="success" class="alert alert-success alert-dismissible" >
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ success }} </h4>                
                </div>
                <p v-if="errors.length">
                    <b>Please correct the following error(s):</b>
                    <ul>
                        <li v-for="error in errors">{{ error }}</li>
                    </ul>
              </p>
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
                <div class="form-group">
                  <label for="CategoryName">Category Name</label>
                  <input type="text" v-model="name" class="form-control" id="CategoryName" placeholder="Category Name">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button @click="CheckForm" type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
	</div>
</template>
<script>
    export default {
        data: function() {
            return {
                errors: [],
                parentId : 0,
                name: '',
                category: '',
                success: null,
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
                .then(function (response) {
                    
                    if(!this.success) {
                       this.success.push('Category Add Succesfully!');  
                    }
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error)
                })
            },

            CheckForm: function (event) {
                let that = this;
                that.errors = [];
                if (!that.name) {
                    that.errors.push('Category Name is required');
                } else {
                    that.StoreCate();
                }
                event.preventDefault()
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
