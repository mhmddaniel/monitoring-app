<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['gallery']='padmin/gallery';
$route['']='padmin';
$route['proyek']='padmin/proyek';
$route['serapan']='padmin/serapan';
$route['lampiran']='padmin/lampiran';
$route['catatan']='padmin/catatan';
$route['proyek/edit_proyek/(:any)']='padmin/get_edit_proyek/$1';
$route['proyek/adm_pekerjaan/(:any)']='padmin/proyek_anggaran/$1';
$route['proyek/detail_proyek/(:any)']='padmin/detail_proyek/$1';
$route['proyek/tambah_proyek/(:any)']='padmin/tambah_proyek/$1';
$route['user/edit_user/(:any)']='padmin/get_edit_user/$1';
$route['PJ/edit_pj/(:any)']='padmin/get_edit_pn/$1';
$route['user/tambah_user']='padmin/tambah_user';
$route['PJ']='padmin/penanggung_jawab';
$route['PJ/tambah_pj']='padmin/tambah_penanggung_jawab';
$route['user']='padmin/user';
$route['proyek/data_awal/(:any)']='padmin/data_awal/$1';
$route['proyek/edit_jadwal/(:any)']='padmin/edit_proyek_jadwal/$1';
$route['proyek/data_bidang/(:any)']='padmin/get_proyek_bidang/$1';
$route['proyek/uplampiran/(:any)']='padmin/uplampiran/$1';


$route['gallery/(:any)']='padmin/gallery/$1';
$route['lampiran/(:any)']='padmin/lampiran/$1';
$route['catatan/(:any)']='padmin/catatan/$1';
$route['blogs']='blog';
$route['blogs/(:any)']='blog/detail/$1';
$route['default_controller'] = 'padmin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
