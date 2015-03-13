
<?php $this->widget('zii.widgets.CListView', [
    'dataProvider' => $dataProvider,
    'viewData' => [
      'tvs_id'=>$tvs_id,

    ],
    'itemView' => '_change_actor_detail',
    'ajaxUpdate'=>true,
]); ?>