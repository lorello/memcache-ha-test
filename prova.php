<?php

$me = new Memcache;
$me->addServer('localhost', 11230);
$me->addServer('localhost', 11240);


$timeout = 100; # default: 1
$retry_interval = 15; #default: 15
$is_online = TRUE; # mettere a false per impostare l'host forzatamente failed ma senza ricalcolo degli hash
$me->setServerParams( 'localhost', 11230, $timeout, $retry_interval, $is_online, '_callback_memcache_failure');
$me->setServerParams( 'localhost', 11240, $timeout, $retry_interval, $is_online, '_callback_memcache_failure');

print "Entering infinite loop...\n\n";
while(TRUE) {

  $value = time();
  if ($me->set('acme', $value))
    print "[ ok ] Setting a timestamp as value: $value\n";
  else
    print "[ KO ] Setting a timestamp as value: $value\n";

  sleep(30);
  if ($result = $me->get('acme'))
    print "[ ok ] Getting value '$result'\n";
  else
    print "[ KO ] Error getting value from server\n";
}

function _callback_memcache_failure($host, $port) {
  print "[!!!!] Memcache '$host:$port' failed\n";
}
