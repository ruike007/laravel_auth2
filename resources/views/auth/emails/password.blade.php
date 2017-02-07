您好，您在msekko内部数据网申请了密码重置！
如果是您本人操作，请点击这条链接来重置您的密码:
<a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>

本链接一小时内有效。
