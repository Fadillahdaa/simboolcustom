<?php 


$profil = App\Models\Profil::first(); ?>
<p>{{ $profil->tentang }}</p>
<h3>Visi</h3>
<p>{{ $profil->visi }}</p>
<h3>Misi</h3>
<p>{{ $profil->misi }}</p>
