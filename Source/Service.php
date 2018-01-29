<?php
namespace Dfe\SMTP\Source;
// 2018-01-29
final class Service extends \Df\Config\Source {
	/**
	 * 2018-01-29
	 * @override
	 * @see \Df\Config\Source::map()
	 * @used-by \Df\Config\Source::toOptionArray()
	 * @return array(string => string)
	 */
	protected function map() {return dfa_combine_self(self::Gmail, self::Mailgun, self::Other);}

	const Gmail = 'Gmail';
	const Mailgun = 'Mailgun';
	const Other = 'Other';
}