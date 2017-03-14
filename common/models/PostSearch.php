<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Post;

/**
 * PostSearch represents the model behind the search form about `common\models\Post`.
 */
class PostSearch extends Post
{
    public function attributes()
    {
        return array_merge(parent::attributes(),['authorName'],['startTime'],['endTime']);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'create_time', 'update_time', 'author_id'], 'integer'],
            [['title', 'content', 'tags','postStatus0','authorName','startTime','endTime'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Post::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        //var_dump($params);exit();
        $this->load($params); 
        //var_dump($this->load($params));
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'post.status' => $this->status,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'author_id' => $this->author_id,
        ]);
        //var_dump($this->postStatus0) ;exit();
        $query->join('INNER JOIN','User','post.author_id = user.id');
        $query->andFilterWhere(['like','user.nickname',$this->authorName]);
        //echo strtotime("$this->startTime");
        //echo strtotime("$this->endTime");exit();
        if ($this->startTime&&$this->endTime) {
            $query->andFilterWhere(['between', 'create_time', strtotime("$this->startTime"), strtotime("$this->endTime")+24*60*60]);
        }


        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'tags', $this->tags]);

        $dataProvider->sort->attributes['authorName'] = 
        [
            'asc'=>['user.nickname'=>SORT_ASC],
            'desc'=>['user.nickname'=>SORT_DESC],
        ];

        return $dataProvider;
    }
}
