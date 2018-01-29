<?php
namespace Dfe\SMTP\Settings;
// 2018-01-30
/** @method static Mailgun s() */
final class Mailgun extends \Df\Config\Settings {
	/**
	 * 2018-01-30
	 * @used-by \Dfe\SMTP\Strategy\Mailgun::_options()
	 * @return string
	 */
	function login() {return $this->v();}

	/**
	 * 2018-01-30
	 * @used-by \Dfe\SMTP\Strategy\Mailgun::_options()
	 * @return string
	 */
	function password() {return $this->p();}

	/**
	 * 2018-01-30
	 * @override
	 * @see \Df\Config\Settings::prefix()
	 * @used-by \Df\Config\Settings::v()
	 * @return string
	 */
	protected function prefix() {return 'df_mail/smtp/mailgun';}
}