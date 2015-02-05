<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Product extends Eloquent implements UserInterface, RemindableInterface {

	
	
	protected $fillable = array('product_id','session_id','quantity','single_price','quantity_price','temp_date','temp_status','pro_image','pro_name','pro_desc');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	//protected $table = 'laravel_tmporder';
	protected $table = 'laravel_products';
	
	protected $primaryKey='temp_id';
	

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}