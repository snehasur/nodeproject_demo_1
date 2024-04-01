import React, { useEffect } from "react";
import axios from "axios";
import { useState } from "react";
const ChatPage = () => {
  const [chats, setChats] = useState([]);
  const fetchChats = async () => {
    try {
      const data = await axios.get("/api/chat");
      setChats(data);
    } catch (error) {
      console.log("error", error);
    }
  };
  useEffect(() => {
    fetchChats();
  }, []);
  return (
    <div>
      {chats.map((chat) => (
        <div key={chat._id}>{chat.chatName}</div>
      ))}
    </div>
  );
};

export default ChatPage;
