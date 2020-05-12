<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lesson;

/**
 * LessonSearch represents the model behind the search form of `app\models\Lesson`.
 */
class LessonSearch extends Lesson
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lesson_id'], 'integer'],
            [['lesson_date', 'lesson_name', 'lesson_detail', 'lesson_file', 'username'], 'safe'],
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
        $query = Lesson::find();

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
            'lesson_id' => $this->lesson_id,
            'lesson_date' => $this->lesson_date,
        ]);

        $query->andFilterWhere(['like', 'lesson_name', $this->lesson_name])
            ->andFilterWhere(['like', 'lesson_detail', $this->lesson_detail])
            ->andFilterWhere(['like', 'lesson_file', $this->lesson_file])
            ->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }
}
