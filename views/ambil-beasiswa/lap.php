<?php

use yii\helpers\Html;
use yii\grid\GridView;
$this->title = 'Laporan Ambil Beasiswa';
?>

<h1><center>Laporan Ambil Beasiswa</center></h1>
<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'columns' => [
		'code_trans',
		'tgl',
		'idPeserta.nama_lengkap',
		'noRekening.no_rekening',
		'idPddkn.pendidikan',
		'beasiswa0.jumlah_bea',
		'status',
		'tgl_ambil',
		]
		]);
	echo Html::a('<i class="fa glyphicon glyphicon-print"></i> Print', ['/ambil-beasiswa/mpdf-demo-1'], [
    'class'=>'btn btn-danger', 
    'target'=>'_blank', 
    'data-toggle'=>'tooltip', 
    'title'=>'Will open the generated PDF file in a new window'
]);

?>

</div>
