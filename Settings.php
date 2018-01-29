<?php
namespace Dfe\SMTP;
// 2018-01-28
/** @method static Settings s() */
final class Settings extends \Df\Config\Settings {
	/**
	 * 2018-01-30
	 * @used-by \Dfe\SMTP\Strategy::options()
	 * @return string
	 */
	function service() {return $this->v();}

	/**
	 * 2018-01-28
	 * @override
	 * @see \Df\Config\Settings::prefix()
	 * @used-by \Df\Config\Settings::v()
	 * @return string
	 */
	protected function prefix() {return 'df_mail/smtp';}
}