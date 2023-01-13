<?php

namespace backend\modules\api\resources;

use backend\models\Physical_evaluation;

class PhysicalEvaluationResource extends Physical_evaluation
{
    public function fields(){
        return ['id', 'imc', 'fc_repouso','peso','massa_magra','massa_gorda_ideal','massa_gorda_normal', 'fc_maximo', 'altura', 'massa_gorda', 'peso_corporal', 'excesso_de_peso', 'percentagem_de_gordura', 'user_id', 'worker_id' ];
    }

}