  // typing digits after a valid number will be added to the extension part of the number
allowExtensions: false

// automatically format the number according to the selected country
autoFormat: true

// if there is just a dial code in the input: remove it on blur, and re-add it on focus
autoHideDialCode: true

// add or remove input placeholder with an example number for the selected country
autoPlaceholder: true

// default country
defaultCountry: "ke"

// geoIp lookup function
geoIpLookup: null

// don't insert international dial codes
nationalMode: true

// number type to use for placeholders
numberType: "MOBILE"

// display only these countries
onlyCountries: []
// the countries at the top of the list. defaults to united states and united kingdom
preferredCountries: [ "ke","us"]

// specify the path to the libphonenumber script to enable validation/formatting
utilsScript: ""