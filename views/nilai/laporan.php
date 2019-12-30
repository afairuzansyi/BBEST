<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\NilaiPeserta;
?>

<h3><p class="text-center">Laporan Ambil Beasiswa</p></h3>
<h4><p class="text-center">B-BEST RYDHA</p></h4>
<?php foreach ($model as $mod) ?>
<?php echo '<h4><p class="text-center">Tahun Ajaran {'.$mod->tahun_ajaran.'}</p></h4>';
?>

<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'columns' => [

	/*	[
			'attribute' => 'id_peserta',
            'format' => 'raw',
            'label' => 'Nama Peserta',
            'value'=>function ($data) {
            $d = array();
            foreach ($data->peserta as $k=>$m)
            {
              $d[] = NilaiPeserta::get_nilai_name_by_id($m->id);
            }
            return implode($d, ', '); 
          },
		],*/
		[
			'attribute' => 'Nilai',
            'format' => 'raw',
            'label' => 'Nilai',
            'value' => 'nilai',
		],
		[
			'attribute' => 'Pendidikan',
            'format' => 'raw',
            'label' => 'Pendidikan',
            'value' =>'idPddkn.pendidikan',
		],
		[
			'attribute' => 'Tahun Ajaran',
            'format' => 'raw',
            'label' => 'Tahun Ajaran',
            'value' =>'tahun_ajaran',
		],
                [
            'attribute' => 'Semester',
            'format' => 'raw',
            'label' => 'Semester',
            'value' =>'semester',
        ],
		]
		])
?>

</div>
