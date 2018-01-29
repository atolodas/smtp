<?php
namespace Dfe\SMTP;
use Magento\Framework\Exception\MailException;
use Zend\Mail\Message as Message;
use Zend\Mail\Transport\Smtp;
use Zend\Mail\Transport\SmtpOptions as Options;
/**
 * 2018-01-28
 * @final Unable to use the PHP «final» keyword here because of the M2 code generation.
 * 2018-01-29
 * https://docs.zendframework.com/zend-mail
 * https://docs.zendframework.com/zend-mail/transport/intro
 */
class Transport extends \Df\Framework\Mail\Transport {
	/**
	 * 2018-01-28
	 * @final Unable to use the PHP «final» keyword here because of the M2 code generation.
	 * @override
	 * @see \Magento\Framework\Mail\TransportInterface::getMessage()
	 * @return void
	 * @throws MailException
	 */
	function sendMessage() {
		/**
		 * 2018-01-29
		 * 1) «zend-mail» → «Reference» → «Transports» → «SMTP Transport Usage»:
		 * https://docs.zendframework.com/zend-mail/transport/intro/#smtp-transport-usage
		 * 2) «zend-mail» → «Transports» → «SMTP» → «SMTP Options»:
		 * https://docs.zendframework.com/zend-mail/transport/smtp-options
		 * 3) «zend-mail» → «Transports» → «SMTP» → «SMTP Options» → «Configuration Options»:
		 * https://docs.zendframework.com/zend-mail/transport/smtp-options/#configuration-options
		 */
		$smtp = new Smtp(new Options([
			/**
			 * 2018-01-29
			 * 1) «Fully-qualified classname or short name resolvable via @see \Zend\Mail\Protocol\SmtpPluginManager
			 * See the «SMTP authentication» documentation for details.
			 * https://docs.zendframework.com/zend-mail/transport/smtp-authentication/#connection_class»
			 * 2) «`zend-mail` supports the use of SMTP authentication, which can be enabled via configuration.
			 * The available built-in authentication methods are `PLAIN`, `LOGIN`, and `CRAM-MD5`,
			 * all of which expect 'username' and 'password' values in the configuration array.»
			 * https://docs.zendframework.com/zend-mail/transport/smtp-authentication/#smtp-authentication
			 */
			'connection_class' => ''
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
				'password' => ''
				// 2018-01-29 «either the value `ssl` or `tls`»
				,'ssl' => ''
				,'username' => ''
			]
			// 2018-01-29 «Remote hostname or IP address; defaults to "127.0.0.1"»
			,'host' => ''
			// 2018-01-29 «Name of the SMTP host; defaults to "localhost"»
			,'name' => ''
			// 2018-01-29 «Port on which the remote host is listening; defaults to "25"»
			,'port' => ''
		])); /** @var Smtp $smtp */
		/**
		 * 2018-01-29
		 * 1) @uses \Zend\Mail\Message::fromString():
		 * https://github.com/zendframework/zend-mail/blob/release-2.8.0/src/Message.php#L546-L565
		 * 2) I have implemented it by analogy with
		 * @see \Magento\Email\Model\Transport::sendMessage() in Magento 2.3:
		 * https://github.com/magento/magento2/blob/0379ead3/app/code/Magento/Email/Model/Transport.php#L77-L89
		 */
		$smtp->send(Message::fromString($this->getMessage()->getRawMessage()));
	}
}