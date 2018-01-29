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
	 * 1) «zend-mail» → «Reference» → «Transports» → «SMTP Transport Usage»:
	 * https://docs.zendframework.com/zend-mail/transport/intro/#smtp-transport-usage
	 * 2) «zend-mail» → «Transports» → «SMTP» → «SMTP Options»:
	 * https://docs.zendframework.com/zend-mail/transport/smtp-options
	 * 3) «zend-mail» → «Transports» → «SMTP» → «SMTP Options» → «Configuration Options»:
	 * https://docs.zendframework.com/zend-mail/transport/smtp-options/#configuration-options
	 * 4) @uses \Zend\Mail\Message::fromString():
	 * https://github.com/zendframework/zend-mail/blob/release-2.8.0/src/Message.php#L546-L565
	 * 5) I have implemented it by analogy with
	 * @see \Magento\Email\Model\Transport::sendMessage() in Magento 2.3:
	 * https://github.com/magento/magento2/blob/0379ead3/app/code/Magento/Email/Model/Transport.php#L77-L89
	 * @final Unable to use the PHP «final» keyword here because of the M2 code generation.
	 * @override
	 * @see \Magento\Framework\Mail\TransportInterface::getMessage()
	 * @return void
	 * @throws MailException
	 */
	function sendMessage() {(new Smtp(new Options(Strategy::options())))->send(
		Message::fromString($this->getMessage()->getRawMessage())
	);}
}