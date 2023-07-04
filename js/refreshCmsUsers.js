// Function to call the Refresh CMS Users API
function refreshCmsUsers() {
  jQuery("#btnRefreshCmsUsers").text('Please Wait ...');

  CRM.api4('LalgCmsUser', 'sync', {
  }).then(function(results) {
    // do something with results array
    // console.log(results);
    jQuery("#spanRefreshCmsUsers").text('All Done. ' + results[0]['count'] + ' Users updated');
    jQuery("#btnRefreshCmsUsers").text('Refresh Users Table');
  }, function(failure) {
    // handle failure
    // console.log(failure);
    jQuery("#spanRefreshCmsUsers").text('ERROR:  ' + failure['error_message']);
    jQuery("#btnRefreshCmsUsers").text('Refresh Users Table');
  });

}