<template>
	<div >
    <!-- =============================================== -->
	<MyHeader></MyHeader>
    <!-- Left side column. contains the sidebar -->

	<MySidebar></MySidebar>
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Blank page
          <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Examples</a></li>
          <li class="active">Blank page</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="box">
         <router-view ></router-view>
        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
	<MyFooter></MyFooter>


    <!-- Control Sidebar -->
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->

	</div>
</template>
<script>
import MyHeader from './header';
import MySidebar from './sidebar';
import MyFooter from './footer';

export default {
	components : {MyHeader, MySidebar, MyFooter},
	mounted() {
		console.log(this.$route);
	}
}
</script>