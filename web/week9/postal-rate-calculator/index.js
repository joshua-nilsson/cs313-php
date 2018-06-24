const express = require('express')
const app = express()
const url = require('url')
const path = require('path')
const PORT = process.env.PORT || 5000

app.use(express.static(path.join(__dirname, 'public')))
app.set('views', path.join(__dirname, 'views'))
app.set('view engine', 'ejs')
// Get the Form Page
app.get('/', (req, res) => res.render('pages/form'))
app.listen(PORT, () => console.log(`Listening on ${ PORT }`))
app.use(express.static('public'))
// Get the Rate Page upon Form Submission
app.get('/getRate', (req, res) => {
  handleRate(req, res);
})

function handleRate(req, res) {
  var requestUrl = url.parse(req.url, true)

  //  Example: Query parameters: {"type":"x","weight":"x"}
  console.log("Query parameters: " + JSON.stringify(requestUrl.query))

  var type = requestUrl.query.type
  var weight = Number(requestUrl.query.weight)

  computeRate(res, type, weight)
}

function computeRate(res, type, weight) {
  console.log(type)
  console.log(weight)

  var rate
  var msg = ""

  switch (type) {
    case "Stamped":
      if (weight <= 1) {
        rate = "$" + 0.50
        console.log(rate)
      }
      else if (weight <= 2) {
        rate = "$" + 0.71
      }
      else if (weight <= 3) {
        rate = "$" + 0.92
      }
      else if (weight <= 3.5) {
        rate = "$" + 1.13
      }
      else {
        rate = "N/A"
        // message - weight must be less than or equal to 3.5
        msg = "* Weight must be less than or equal to 3.5"
      }
      var params = {type: type, weight: weight, rate: rate, msg: msg}

      res.render('pages/getRate', params)
      break;
    case "Metered":
      if (weight <= 1) {
        rate = "$" + 0.47
      }
      else if (weight <= 2) {
        rate = "$" + 0.68
      }
      else if (weight <= 3) {
        rate = "$" + 0.89
      }
      else if (weight <= 3.5) {
        rate = "$" + 1.10
      }
      else {
        rate = "N/A"
        // message - weight must be less than or equal to 3.5
        msg = "* Weight must be less than or equal to 3.5"
      }
      var params = {type: type, weight: weight, rate: rate, msg: msg}

      res.render('pages/getRate', params)
      break;
    case "Flats":
      if (weight <= 1) {
        rate = "$" + 1.00
      }
      else if (weight <= 2) {
        rate = "$" + 1.21
      }
      else if (weight <= 3) {
        rate = "$" + 1.42
      }
      else if (weight <= 4) {
        rate = "$" + 1.63
      }
      else if (weight <= 5) {
        rate = "$" + 1.84
      }
      else if (weight <= 6) {
        rate = "$" + 2.05
      }
      else if (weight <= 7) {
        rate = "$" + 2.26
      }
      else if (weight <= 8) {
        rate = "$" + 2.47
      }
      else if (weight <= 9) {
        rate = "$" + 2.68
      }
      else if (weight <= 10) {
        rate = "$" + 2.89
      }
      else if (weight <= 11) {
        rate = "$" + 3.10
      }
      else if (weight <= 12) {
        rate = "$" + 3.31
      }
      else if (weight <= 13) {
        rate = "$" + 3.52
      }
      else {
        rate = "N/A"
        // message - weight must be less than or equal to 13
        msg = "* Weight must be less than or equal to 13"
      }
      var params = {type: type, weight: weight, rate: rate, msg: msg}

      res.render('pages/getRate', params)
      break;

    case "Retail":
      if (weight <= 4) {
        rate = "$" + 3.50
      }
      else if (weight <= 8) {
        rate = "$" + 3.75
      }
      else if (weight <= 9) {
        rate = "$" + 4.10
      }
      else if (weight <= 10) {
        rate = "$" + 4.45
      }
      else if (weight <= 11) {
        rate = "$" + 4.80
      }
      else if (weight <= 12) {
        rate = "$" + 5.15
      }
      else if (weight <= 13) {
        rate = "$" + 5.50
      }
      else {
        rate = "N/A"
        // message - weight must be less than or equal to 13
        msg = "* Weight must be less than or equal to 13"
      }
      var params = {type: type, weight: weight, rate: rate, msg: msg}

      res.render('pages/getRate', params)
      break;

  default:
      app.get('/', (req, res) => res.render('pages/form'))
  }
}
