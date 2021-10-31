<div id='bodyleft'>
	<h3>Categories Management</h3>
	<ul>
		<li><a href="dashboard.php"><i class='fa fa-home' style="font-size: 18px"></i> Dashboard</a></li>
		<li><a href="index.php?cat"><i class='fa fa-reorder' style="font-size: 18px;margin-right: 4px;"></i> View Course Categories</a></li>
		<li><a href="index.php?sub_cat"><i class='fa fa-exchange' style="font-size: 18px;margin-right: 4px;"></i>View Sub Course Categories</a></li>
		<li><a href="index.php?lang"><i class='fa fa-file-code-o' style="font-size: 18px;margin-right: 4px;"></i>View Languages</a></li>

	</ul>
	<h3>Course Management</h3>
	<ul>
		<li><a href="course_edit.php"><i class='fa fa-code' style="font-size: 18px;margin-right: 4px;"></i>Add Courses</a></li>
		<!-- <li><a href="#">Pending Courses</a></li>
		<li><a href="#">Unpublish Courses</a></li>
		<li><a href="#">Advanced Course Search</a></li> -->
	</ul>
	<!-- <h3>User Management</h3>
	<ul>
		<li><a href="#">Veiw All Students</a></li>
		<li><a href="#">View All Teachers</a></li>
		<li><a href="#">Advanced User Search</a></li>
	</ul>
	<h3>Payment Management</h3>
	<ul>
		<li><a href="#">Pay to Instructor</a></li>
		<li><a href="#">Complete Payment</a></li>
		<li><a href="#">Advanced Payment Search</a></li>
	</ul> -->

	<h3>Pages Management</h3>
	<ul>
		<li><a href="index.php?terms"><i class='fa fa-cog' style="font-size: 18px;margin-right: 4px;"></i>Terms & Conditions Page</a></li>
		<li><a href="index.php?contact"><i class='fa fa-clone' style="font-size: 18px;margin-right: 4px;"></i>Contact Us Page</a></li>
		<li><a href="index.php?about"><i class='fa fa-bookmark' style="font-size: 18px;margin-right: 4px;"></i>About Us Page</a></li>
		<li><a href="index.php?faqs"><i class='fa fa-edit' style="font-size: 18px;margin-right: 4px;"></i>FAQs Page</a></li>
		<li><a href="#"><i class='fa fa-bars' style="font-size: 18px;margin-right: 4px;"></i>Edit Slider</a></li>
	</ul>

</div>

<?php
if (isset($_GET['cat'])) {
	include("catt.php");
}

if (isset($_GET['lang'])) {
	include("lang.php");
}
if (isset($_GET['sub_cat'])) {
	include("sub_cat.php");
}
if (isset($_GET['terms'])) {
	include("terms.php");
}
if (isset($_GET['contact'])) {
	include("contact.php");
}
if (isset($_GET['faqs'])) {
	include("faqs.php");
}
if (isset($_GET['about'])) {
	include("about.php");
}
?>