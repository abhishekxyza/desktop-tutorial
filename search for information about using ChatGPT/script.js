// script.js
const topics = [
    { title: "Task Management", description: "Learn how to use ChatGPT to manage tasks efficiently by automating task lists and reminders." },
    { title: "Team Collaboration", description: "Discover ways ChatGPT can facilitate communication and collaboration between team members." },
    { title: "Meeting Summaries", description: "Use ChatGPT to summarize meeting notes and action points for quick reviews." },
    { title: "Project Planning", description: "ChatGPT can assist in project timelines, milestones, and goal setting." },
    { title: "Risk Management", description: "Identify and mitigate project risks using ChatGPT’s analytical capabilities." }
  ];
  
  function searchTopics() {
    const query = document.getElementById('searchBox').value.toLowerCase();
    const resultsContainer = document.getElementById('results');
    resultsContainer.innerHTML = '';
    
    const filteredTopics = topics.filter(topic => 
      topic.title.toLowerCase().includes(query) || topic.description.toLowerCase().includes(query)
    );
  
    if (filteredTopics.length === 0) {
      resultsContainer.innerHTML = '<p>No results found.</p>';
    } else {
      filteredTopics.forEach(topic => {
        const topicDiv = document.createElement('div');
        topicDiv.innerHTML = `<h3>${topic.title}</h3><p>${topic.description}</p>`;
        resultsContainer.appendChild(topicDiv);
      });
    }
  }
  