<template>
	<div>
		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <div class="box-header with-border">
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
                <select v-model="parentId"class="form-control">
                    <option value="0">option 1</option>
                    <option value="1">option 2</option>
                    <option value="2">option 3</option>
                    <option value="3">option 4</option>
                    <option value="4">option 5</option>
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
            }
        },

        methods: {
            StoreCate: function (event) {
                axios.post('./api/category', {
                    parent_id: this.parentId,
                    name: this.name
                })
                .then(function (response) {
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error)
                })
            },

            CheckForm: function (event) {
                let that = this;
                if (!that.name) {
                    that.errors.push('Category Name is required');
                } else {
                    that.StoreCate();
                }
                event.preventDefault()
            },

            ListCate: function () {
                axios.get('./api/category')
                .then(function (response) {
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                })
            }
        }
    }
</script>
