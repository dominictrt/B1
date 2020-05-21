<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\QuestionDetail;

/**
 * QuestionDetailSearch represents the model behind the search form of `app\models\QuestionDetail`.
 */
class QuestionDetailSearch extends QuestionDetail
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['q_id'], 'integer'],
            [['qu_id', 'qu_detail', 'ans1', 'ans2', 'ans3', 'ans4', 'ans_correct'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = QuestionDetail::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'q_id' => $this->q_id,
        ]);

        $query->andFilterWhere(['like', 'qu_id', $this->qu_id])
            ->andFilterWhere(['like', 'qu_detail', $this->qu_detail])
            ->andFilterWhere(['like', 'ans1', $this->ans1])
            ->andFilterWhere(['like', 'ans2', $this->ans2])
            ->andFilterWhere(['like', 'ans3', $this->ans3])
            ->andFilterWhere(['like', 'ans4', $this->ans4])
            ->andFilterWhere(['like', 'ans_correct', $this->ans_correct]);

        return $dataProvider;
    }
}
