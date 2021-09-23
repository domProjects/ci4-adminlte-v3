		<!-- Brand Logo -->
		<?= $brand ?>

		<!-- Sidebar -->
		<div class="sidebar">
			<!-- Sidebar User Panel (optional) -->
			<?= $sidebarUserPanel ?>

			<!-- Sidebar Search Form (optional) -->
			<?= $sidebarSearchForm ?>

			<!-- Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column<?= $sidebarMenuClass ?>" data-widget="treeview" role="menu" data-accordion="false">
					<?= $menu ?>
				</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
