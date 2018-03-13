<template>
<div class="row">
	<div class="col-md-9">
		<h2>Basic Table</h2>
		<p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>            
		<table class="table table-hover">
			<tr class="text-center">
				<td><b>STT</b></td>
				<td><b>Name</b></td>
				<td><b>Created</b></td> 
				<td><b>Updated</b></td>
				<td><b>Action</b></td>
			</tr>
			<tbody v-html="categoryList">
			
			</tbody>
		</table>
	</div>
</div>
</template>
<script>
export default {
	data: function() {
		return {
			categoryList: ''
		}
	},

	beforeMount: function() {
		this.ListCategory();
	},

	methods: {
		ListCategory: function () {
			axios.get('./api/category')
			.then((response) => {
				this.categoryList = (response.data);
			})
			
		}
	}
}
</script>