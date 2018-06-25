<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
	<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?=base_url()?>">OpenPWS</a>
	<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
	<ul class="navbar-nav px-3">
		<li class="nav-item text-nowrap">
			<a class="nav-link" href="<?=base_url()?>welcome/logout">Sign out</a>
		</li>
	</ul>
</nav>

<div class="container-fluid">
	<div class="row">
		<nav class="col-md-2 d-none d-md-block bg-light sidebar">
			<div class="sidebar-sticky">
				<div class="list-group" id="accordion">
					<a class="list-group-item list-group-item-action list-group-item-secondary" href="<?=base_url()?>">
						<span data-feather="home"></span> Home
					</a>
					<a class="list-group-item list-group-item-action list-group-item-secondary"  data-toggle="collapse" href="#submenu1" role="button" aria-expanded="false" aria-controls="submenu1">
						<span data-feather="edit-3"></span> Data Entry
						<span class="float-right" data-feather="chevron-down"></span>
					</a>
					<div class="collapse list-group <?=$this->uri->segment(1)=="dataentry"?"show":""?>" id="submenu1" data-parent="#accordion">
						<a href="<?=base_url()?>dataentry/byform" class="list-group-item list-group-item-action <?=$this->uri->segment(2)=="byform"?"active":""?>">Berdasarkan Form</a>
						<a href="<?=base_url()?>dataentry/bytanggal" class="list-group-item list-group-item-action <?=$this->uri->segment(2)=="bytanggal"?"active":""?>">Berdasarkan Tanggal</a>
						<a href="<?=base_url()?>dataentry/ontime" class="list-group-item list-group-item-action <?=$this->uri->segment(2)=="ontime"?"active":""?>">Ontime Submission</a>
					</div>
					<a class="list-group-item list-group-item-action list-group-item-secondary"  data-toggle="collapse" href="#submenu2" role="button" aria-expanded="false" aria-controls="submenu2">
						<span data-feather="file-text"></span> Laporan
						<span class="float-right" data-feather="chevron-down"></span>
					</a>
					<div class="collapse list-group <?=$this->uri->segment(1)=="laporan"?"show":""?>" id="submenu2" data-parent="#accordion">
						<a href="<?=base_url()?>laporan/cakupan" class="list-group-item list-group-item-action <?=$this->uri->segment(2)=="cakupan"?"active":""?>">Grafik Cakupan</a>
						<a href="<?=base_url()?>laporan/pws" class="list-group-item list-group-item-action <?=$this->uri->segment(2)=="pws"?"active":""?>">Download PWS</a>
					</div>
					<a class="list-group-item list-group-item-action list-group-item-secondary"  data-toggle="collapse" href="#submenu3" role="button" aria-expanded="false" aria-controls="submenu3">
						<span data-feather="trending-up"></span> HHH Score
						<span class="float-right" data-feather="chevron-down"></span>
					</a>
					<div class="collapse list-group <?=$this->uri->segment(1)=="hhhscore"?"show":""?>" id="submenu3" data-parent="#accordion">
						<a href="<?=base_url()?>hhhscore/head" class="list-group-item list-group-item-action <?=$this->uri->segment(2)=="head"?"active":""?>">Head Score</a>
						<a href="<?=base_url()?>hhhscore/hand" class="list-group-item list-group-item-action <?=$this->uri->segment(2)=="hand"?"active":""?>">Hand Score</a>
						<a href="<?=base_url()?>hhhscore/heart" class="list-group-item list-group-item-action <?=$this->uri->segment(2)=="heart"?"active":""?>">Heart Score</a>
					</div>
					<a class="list-group-item list-group-item-action list-group-item-secondary"  data-toggle="collapse" href="#submenu4" role="button" aria-expanded="false" aria-controls="submenu4s">
						<span data-feather="database"></span> Data
						<span class="float-right" data-feather="chevron-down"></span>
					</a>
					<div class="collapse list-group <?=$this->uri->segment(1)=="data"?"show":""?>" id="submenu4" data-parent="#accordion">
						<a href="<?=base_url()?>data/dataibu" class="list-group-item list-group-item-action <?=$this->uri->segment(2)=="dataibu"?"active":""?>">Data Ibu</a>
						<a href="<?=base_url()?>data/dataanak" class="list-group-item list-group-item-action <?=$this->uri->segment(2)=="dataanak"?"active":""?>">Data Anak</a>
					</div>
				</div>
			</div>
		</nav>
