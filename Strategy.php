<?php
namespace Dfe\SMTP;
use Dfe\SMTP\Settings as S;
/**
 * 2017-01-30
 * @see \Dfe\SMTP\Strategy\Mailgun
 */
abstract class Strategy {
	/**
	 * 2017-01-30
	 * @used-by options()
	 * @return array(string => mixed)
	 */
	abstract protected function _options();

	/**
	 * 2017-01-30
	 * @used-by \Dfe\SMTP\Transport::sendMessage()
	 * @return array(string => mixed)
	 */
	static function options() {
		$i = df_new(df_cc_class(get_class(), S::s()->service())); /** @var Strategy $i */
		return $i->_options();
	}
}