{"filter":false,"title":"script.js","tooltip":"/script.js","undoManager":{"mark":4,"position":4,"stack":[[{"start":{"row":0,"column":0},"end":{"row":152,"column":1},"action":"insert","lines":["/******************************************************************************"," * This tutorial is based on the work of Martin Hawksey twitter.com/mhawksey  *"," * But has been simplified and cleaned up to make it more beginner friendly   *"," * All credit still goes to Martin and any issues/complaints/questions to me. *"," ******************************************************************************/","","// if you want to store your email server-side (hidden), uncomment the next line","// var TO_ADDRESS = \"example@email.net\";","","// spit out all the keys/values from the form in HTML for email","// uses an array of keys if provided or the object to determine field order","function formatMailBody(obj, order) {","  var result = \"\";","  if (!order) {","    order = Object.keys(obj);","  }","  ","  // loop over all keys in the ordered form data","  for (var idx in order) {","    var key = order[idx];","    result += \"<h4 style='text-transform: capitalize; margin-bottom: 0'>\" + key + \"</h4><div>\" + sanitizeInput(obj[key]) + \"</div>\";","    // for every key, concatenate an `<h4 />`/`<div />` pairing of the key name and its value, ","    // and append it to the `result` string created at the start.","  }","  return result; // once the looping is done, `result` will be one long string to put in the email body","}","","// sanitize content from the user - trust no one ","// ref: https://developers.google.com/apps-script/reference/html/html-output#appendUntrusted(String)","function sanitizeInput(rawInput) {","   var placeholder = HtmlService.createHtmlOutput(\" \");","   placeholder.appendUntrusted(rawInput);","  ","   return placeholder.getContent();"," }","","function doPost(e) {","","  try {","    Logger.log(e); // the Google Script version of console.log see: Class Logger","    record_data(e);","    ","    // shorter name for form data","    var mailData = e.parameters;","","    // names and order of form elements (if set)","    var orderParameter = e.parameters.formDataNameOrder;","    var dataOrder;","    if (orderParameter) {","      dataOrder = JSON.parse(orderParameter);","    }","    ","    // determine recepient of the email","    // if you have your email uncommented above, it uses that `TO_ADDRESS`","    // otherwise, it defaults to the email provided by the form's data attribute","    var sendEmailTo = (typeof TO_ADDRESS !== \"undefined\") ? TO_ADDRESS : mailData.formGoogleSendEmail;","    ","    // send email if to address is set","    if (sendEmailTo) {","      MailApp.sendEmail({","        to: String(sendEmailTo),","        subject: \"Contact form submitted\",","        // replyTo: String(mailData.email), // This is optional and reliant on your form actually collecting a field named `email`","        htmlBody: formatMailBody(mailData, dataOrder)","      });","    }","","    return ContentService    // return json success results","          .createTextOutput(","            JSON.stringify({\"result\":\"success\",","                            \"data\": JSON.stringify(e.parameters) }))","          .setMimeType(ContentService.MimeType.JSON);","  } catch(error) { // if error return this","    Logger.log(error);","    return ContentService","          .createTextOutput(JSON.stringify({\"result\":\"error\", \"error\": error}))","          .setMimeType(ContentService.MimeType.JSON);","  }","}","","","/**"," * record_data inserts the data received from the html form submission"," * e is the data received from the POST"," */","function record_data(e) {","  var lock = LockService.getDocumentLock();","  lock.waitLock(30000); // hold off up to 30 sec to avoid concurrent writing","  ","  try {","    Logger.log(JSON.stringify(e)); // log the POST data in case we need to debug it","    ","    // select the 'responses' sheet by default","    var doc = SpreadsheetApp.getActiveSpreadsheet();","    var sheetName = e.parameters.formGoogleSheetName || \"responses\";","    var sheet = doc.getSheetByName(sheetName);","    ","    var oldHeader = sheet.getRange(1, 1, 1, sheet.getLastColumn()).getValues()[0];","    var newHeader = oldHeader.slice();","    var fieldsFromForm = getDataColumns(e.parameters);","    var row = [new Date()]; // first element in the row should always be a timestamp","    ","    // loop through the header columns","    for (var i = 1; i < oldHeader.length; i++) { // start at 1 to avoid Timestamp column","      var field = oldHeader[i];","      var output = getFieldFromData(field, e.parameters);","      row.push(output);","      ","      // mark as stored by removing from form fields","      var formIndex = fieldsFromForm.indexOf(field);","      if (formIndex > -1) {","        fieldsFromForm.splice(formIndex, 1);","      }","    }","    ","    // set any new fields in our form","    for (var i = 0; i < fieldsFromForm.length; i++) {","      var field = fieldsFromForm[i];","      var output = getFieldFromData(field, e.parameters);","      row.push(output);","      newHeader.push(field);","    }","    ","    // more efficient to set values as [][] array than individually","    var nextRow = sheet.getLastRow() + 1; // get next row","    sheet.getRange(nextRow, 1, 1, row.length).setValues([row]);","","    // update header row with any new data","    if (newHeader.length > oldHeader.length) {","      sheet.getRange(1, 1, 1, newHeader.length).setValues([newHeader]);","    }","  }","  catch(error) {","    Logger.log(error);","  }","  finally {","    lock.releaseLock();","    return;","  }","","}","","function getDataColumns(data) {","  return Object.keys(data).filter(function(column) {","    return !(column === 'formDataNameOrder' || column === 'formGoogleSheetName' || column === 'formGoogleSendEmail' || column === 'honeypot');","  });","}","","function getFieldFromData(field, data) {","  var values = data[field] || '';","  var output = values.join ? values.join(', ') : values;","  return output;","}"],"id":1}],[{"start":{"row":7,"column":0},"end":{"row":7,"column":3},"action":"remove","lines":["// "],"id":2}],[{"start":{"row":7,"column":18},"end":{"row":7,"column":35},"action":"remove","lines":["example@email.net"],"id":3},{"start":{"row":7,"column":18},"end":{"row":7,"column":19},"action":"insert","lines":["p"]},{"start":{"row":7,"column":19},"end":{"row":7,"column":20},"action":"insert","lines":["a"]},{"start":{"row":7,"column":20},"end":{"row":7,"column":21},"action":"insert","lines":["r"]},{"start":{"row":7,"column":21},"end":{"row":7,"column":22},"action":"insert","lines":["k"]},{"start":{"row":7,"column":22},"end":{"row":7,"column":23},"action":"insert","lines":["s"]},{"start":{"row":7,"column":23},"end":{"row":7,"column":24},"action":"insert","lines":["."]},{"start":{"row":7,"column":24},"end":{"row":7,"column":25},"action":"insert","lines":["l"]},{"start":{"row":7,"column":25},"end":{"row":7,"column":26},"action":"insert","lines":["e"]},{"start":{"row":7,"column":26},"end":{"row":7,"column":27},"action":"insert","lines":["e"]}],[{"start":{"row":7,"column":27},"end":{"row":7,"column":28},"action":"insert","lines":["8"],"id":4},{"start":{"row":7,"column":28},"end":{"row":7,"column":29},"action":"insert","lines":["4"]},{"start":{"row":7,"column":29},"end":{"row":7,"column":30},"action":"insert","lines":["@"]},{"start":{"row":7,"column":30},"end":{"row":7,"column":31},"action":"insert","lines":["g"]},{"start":{"row":7,"column":31},"end":{"row":7,"column":32},"action":"insert","lines":["m"]},{"start":{"row":7,"column":32},"end":{"row":7,"column":33},"action":"insert","lines":["a"]},{"start":{"row":7,"column":33},"end":{"row":7,"column":34},"action":"insert","lines":["i"]}],[{"start":{"row":7,"column":34},"end":{"row":7,"column":35},"action":"insert","lines":["l"],"id":5},{"start":{"row":7,"column":35},"end":{"row":7,"column":36},"action":"insert","lines":["."]},{"start":{"row":7,"column":36},"end":{"row":7,"column":37},"action":"insert","lines":["c"]},{"start":{"row":7,"column":37},"end":{"row":7,"column":38},"action":"insert","lines":["o"]},{"start":{"row":7,"column":38},"end":{"row":7,"column":39},"action":"insert","lines":["m"]}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":8,"column":0},"end":{"row":8,"column":0},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1571704878499,"hash":"1e5928055be493f25511905e994b00bc1d1f8156"}