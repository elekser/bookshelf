<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Books extends ActiveRecord
{
	public function attributeLabels()
	{
		return [
			'ID' => Yii::t('app','Номер книги'),
			'TITLE' => Yii::t('app','Название книги'),
			'authorName' => Yii::t('app','Имя автора'),
			'authorFamily' => Yii::t('app','Фамилия автора'),
			'ISBN' => Yii::t('app','ISBN'),
			'STYLE' => Yii::t('app','Жанр'),
			'DESCR' => Yii::t('app','Описание книги'),
		];
	}

	public function rules()
	{
		return [ 
			[['TITLE','authorName','authorFamily','ISBN','DESCR','STYLE'],'required'],
			[['TITLE','authorName','authorFamily','STYLE'],'string', 'max'=>'100'],
			[['DESCR'],'string', 'max'=>'200'],
			[['ISBN'],'string', 'max'=>'20'],
		];
	}
}
