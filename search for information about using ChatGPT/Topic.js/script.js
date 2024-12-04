// frontend/script.js
async function fetchTopics() {
    const response = await fetch('http://localhost:5000/api/topics');
    const topics = await response.json();
    
    const resultsContainer = document.getElementById('results');
    resultsContainer.innerHTML = '';
    
    topics.forEach(topic => {
      const topicDiv = document.createElement('div');
      topicDiv.innerHTML = `<h3>${topic.title}</h3><p>${topic.description}</p>`;
      resultsContainer.appendChild(topicDiv);
    });
  }
  
  async function addTopic(title, description) {
    const response = await fetch('http://localhost:5000/api/topics', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ title, description })
    });
    if (response.ok) fetchTopics();
  }
  
  fetchTopics();
  