// backend/routes/topics.js
const express = require('express');
const router = express.Router();
const Topic = require('../models/Topic');

// Fetch all topics
router.get('/', async (req, res) => {
  try {
    const topics = await Topic.find();
    res.json(topics);
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
});

// Add a new topic
router.post('/', async (req, res) => {
  const newTopic = new Topic({
    title: req.body.title,
    description: req.body.description,
  });

  try {
    const savedTopic = await newTopic.save();
    res.status(201).json(savedTopic);
  } catch (err) {
    res.status(400).json({ error: err.message });
  }
});

module.exports = router;
