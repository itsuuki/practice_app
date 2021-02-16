# practice_app
 
## usersテーブル
|Column|Type|Options|
|------|----|-------|
|name|string|null: false|
|email|string|null: false|
|password|integer|null: false|



### Association
- has_many items




## itmesテーブル
|Column|Type|Options|
|------|----|-------|
|item_name|string|null: false|
|item_price|integer|null: false|
|detail|text|null: false|
|delivery|text|null: false|
|quantity|text|null: false|



|user_id|integer|null: false, foreign_key: true|



### Association
- has_many publishers
- belongs_to :user


## Publishersテーブル
|Column|Type|Options|
|------|----|-------|
|publisher_name|string|null: false|
|item_id|integer|null: false, foreign_key: true|



### Association
- belongs_to :item