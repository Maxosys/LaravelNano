<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Admin extends Eloquent implements UserInterface, RemindableInterface {

	
	protected $table = 'laravel_products';
	
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
	
	public static function get_category()
	{
		//$cate = Admin::all()->get();
		$cate = DB::table('laravel_product_category')->get();
		return $cate;
		/*echo "<pre>";
		print_r($cate);
		exit;*/
	}
	
	public static function insert_product($value)
	{
		//print_r($value);
		//exit;
		DB::table('laravel_products')->insert($value);
	}
	public static function update_product($value, $id)
	{
		DB::table('laravel_products')->where('product_id',$id)->update($value);
	}

}
?>