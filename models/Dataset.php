<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "datasets".
 *
 * @property integer $s_id
 * @property string $dataset_name
 * @property string $dataset_id
 * @property integer $workspace_id
 * @property string $datasource_id
 * @property string $gateway_id
 *
 * @property Workspaces $workspace
 */
class Dataset extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'datasets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dataset_name', 'dataset_id', 'datasource_id', 'gateway_id'], 'string'],
            [['workspace_id'], 'integer'],
            [['workspace_id'], 'exist', 'skipOnError' => true, 'targetClass' => Workspaces::className(), 'targetAttribute' => ['workspace_id' => 'w_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            's_id' => 'S ID',
            'dataset_name' => 'Dataset Name',
            'dataset_id' => 'Dataset ID',
            'workspace_id' => 'Workspace ID',
            'datasource_id' => 'Datasource ID',
            'gateway_id' => 'Gateway ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkspace()
    {
        return $this->hasOne(Workspaces::className(), ['w_id' => 'workspace_id']);
    }
}