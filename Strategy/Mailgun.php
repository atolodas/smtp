<?php
namespace Dfe\SMTP\Strategy;
use \Dfe\SMTP\Settings\Mailgun as S;
final class Mailgun extends \Dfe\SMTP\Strategy {
	/**
	 * 2017-01-30
	 * @override
	 * @see \Dfe\SMTP\Strategy::_options()
	 * @used-by \Dfe\SMTP\Strategy::options()
	 * @return array(string => mixed)
	 */
	protected function _options() {$s = S::s(); /** @var S $s */ return [
		/**
		 * 2018-01-30
		 * «The connection class should be a fully qualified class name
		 * of a Zend\Mail\Protocol\Smtp\Auth\* class or extension,
		 * or the short name (name without leading namespace).
		 * zend-mail ships with the following:
		 * 		@see \Zend\Mail\Protocol\Smtp\Auth\Crammd5, or `crammd5`
		 * 		@see \Zend\Mail\Protocol\Smtp\Auth\Login, or `login`
		 * 		@see \Zend\Mail\Protocol\Smtp\Auth\Plain, or `plain`
		 * Custom connection classes must be extensions of @see \Zend\Mail\Protocol\Smtp.»
		 * https://docs.zendframework.com/zend-mail/transport/smtp-authentication/#connection_class
		 */
		'connection_class' => 'plain'
		/**
		 * 2018-01-29
		 * 1) «Optional associative array of parameters to pass to the connection class in order to configure it.
		 * By default, this is empty.
		 * See the «SMTP authentication» documentation for details.
		 * https://docs.zendframework.com/zend-mail/transport/smtp-authentication/#connection_class»
		 * 2) «The connection_config should be an associative array of options
		 * to provide to the underlying connection class.
		 * All shipped connection classes require:
		 * 		`username`
		 * 		`password`
		 * Optionally, you may also provide:
		 * 		`ssl`: either the value `ssl` or `tls`.
		 * 		`port`:
		 * 			if using something other than the default port for the protocol used.
		 * 			Port 25 is the default used for non-SSL connections, 465 for SSL, and 587 for TLS.
		 * 		`use_complete_quit`:
		 * 			configuring whether or not an SMTP transport should issue a `QUIT` at `__destruct()`
		 * 			and/or end of script execution.
		 * 			Useful in long-running scripts against SMTP servers that implements a reuse time limit.»
		 * https://docs.zendframework.com/zend-mail/transport/smtp-authentication/#connection_config
		 */
		,'connection_config' => [
			'password' => $s->password()
			// 2018-01-29 «either the value `ssl` or `tls`»
			,'ssl' => 'tls'
			,'username' => $s->login()
		]
		// 2018-01-29 «Remote hostname or IP address; defaults to "127.0.0.1"»
		,'host' => 'smtp.mailgun.org'
		// 2018-01-29 «Name of the SMTP host; defaults to "localhost"»
		,'name' => 'smtp.mailgun.org'
		// 2018-01-29 «Port on which the remote host is listening; defaults to "25"»
		,'port' => '587'
	];}
}


