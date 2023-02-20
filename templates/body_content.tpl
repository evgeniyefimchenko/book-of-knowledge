<div class="container">
	<div class="row" id="navigations">
		<div class="col">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			  <div class="container-fluid">
				<a class="navbar-brand" href="//<?=APP_URL?>index.php"><?=APP_NAME?></a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
				  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
					  <a class="nav-link" data-bs-toggle="modal" data-bs-target="#login_form" href="#">Авторизация</a>
					</li>
					<li class="nav-item dropdown">
					  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Dropdown
					  </a>
					  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						<li><a class="dropdown-item" href="#">Action</a></li>
						<li><a class="dropdown-item" href="#">Another action</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item" href="#">Something else here</a></li>
					  </ul>
					</li>
				  </ul>
				  <form class="d-flex">
					<input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Ищи</button>
				  </form>
				</div>
			  </div>
			</nav>	
		</div>
	</div>
	
	<div class="modal fade" id="login_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">Авторизация</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			<div class="mb-3">
			  <label for="login_input" class="form-label">Логин</label>
			  <input type="text" required class="form-control" id="login_input">
			</div>
			<div class="mb-3">
			  <label for="pass_input" required class="form-label">Пароль</label>
			  <input type="text" class="form-control" id="pass_input">
			</div>
		  </div>
		  <div class="modal-footer">			
			<button type="button" class="btn btn-primary">Поехали</button>
		  </div>
		</div>
	  </div>
	</div>
	
	<div class="row">
		<div class="col">
			<nav aria-label="breadcrumb" class="mx-auto" style="background: #efefef;">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Главная</a></li> 
				</ol>
			</nav>
		</div>
	</div>
</div>
