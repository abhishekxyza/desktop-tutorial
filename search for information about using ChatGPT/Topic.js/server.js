// backend/server.js
const express = require('express');
const mongoose = require('mongoose');
const cors = require('cors');
const bodyParser = require('body-parser');
const topicsRoute = require('./routes/topics');

const app = express();
const PORT = 5000;
const MONGO_URI = 'mongodb://localhost:27017/projectManagementDB';

// Middleware
app.use(cors());
app.use(bodyParser.json());
app.use('/api/topics', topicsRoute);

// Connect to MongoDB
mongoose.connect(MONGO_URI, { useNewUrlParser: true, useUnifiedTopology: true })
  .then(() => console.log('MongoDB connected'))
  .catch(err => console.error(err));

// Start server
app.listen(PORT, () => console.log(`Server running on http://localhost:${PORT}`));
