import Vue from 'vue'
import Router from 'vue-router'

import ListBook from './../components/views/admin/book/ListBook'
import AddBook from './../components/views/admin/book/AddBook'
import EditBook from  './../components/views/admin/book/EditBook'

import ListCategory from  './../components/views/admin/category/ListCategory.vue'
import AddCategory from './../components/views/admin/category/AddCategory'
import EditCateogry from './../components/views/admin/category/EditCategory'

import ListUser from './../components/views/admin/user/ListUser'
import AddUser from './../components/views/admin/user/AddUser'
import EditUser from './../components/views/admin/user/EditUser'

import ListComment from './../components/views/admin/comment/ListComment'

Vue.use(Router)

export default new Router({
	routes: [
		{ path: '/', name: 'User', component: ListUser },
		{ path: '/adduser', name: 'AddUser', component: AddUser },
		{ path: '/edituser', name: 'EditUser', component: EditUser },
		{ path: '/listBook', name: 'Book', component: ListBook },
		{ path: '/addbook', name: 'AddBook', component: AddBook },
		{ path: '/editbook', name: 'EditBook', component: EditBook },
		{ path: '/category', name: 'Category', component: ListCategory },
		{ path: '/addcategory', name: 'AddCategory', component: AddCategory },
		{ path: '/editcategory', name: 'EditCategory', component: EditCateogry },
		{ path: '/comment', name: 'Comment', component: ListComment },
	],
 	mode: 'history',
})