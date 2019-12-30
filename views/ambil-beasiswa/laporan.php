<?php

use yii\helpers\Html;
use yii\grid\GridView;
?>
<?php $this->title = 'Laporan Ambil Beasiswa'; ?>
<h3><p class="text-center">Laporan Ambil Beasiswa</p></h3>
<h4><p class="text-center">B-BEST RYDHA</p></h4>
<?php foreach ($model as $mod)?>
<?php echo '<h4><p class="text-center">Periode {'.$mod->tgl.'}</p></h4>';
?>

<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'columns' => [
		'code_trans',
		'tgl',
		[
			'attribute' => 'id_peserta',
            'format' => 'raw',
            'label' => 'Nama Peserta',
            'value' =>'idPeserta.nama_lengkap',
		],
		[
			'attribute' => 'no_rekening',
            'format' => 'raw',
            'label' => 'No Rek',
            'value' => 'noRekening.no_rekening',
		],
		[
			'attribute' => 'id_pddkn',
            'format' => 'raw',
            'label' => 'Pendidikan',
            'value' =>'idPddkn.pendidikan',
		],
		[
			'attribute' => 'beasiswa',
            'format' => 'raw',
            'label' => 'Beasiswa',
            'value' =>'beasiswa0.jumlah_bea',
		],
		[
                'attribute' => 'status',
                'format' => 'raw',
                'label' => 'Status',
                'value' => function($model){
                            $h = '';
                            if($model->status==0){
                                $h = 'Belum Diambil';
                            }elseif($model->status==1){
                                $h = 'Diambil';
                            }
                        return $h;
                }
        ],
		'tgl_ambil',
		]
		])
?>

</div>
