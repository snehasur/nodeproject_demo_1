import React, { useState, useEffect } from "react";
import styled from "styled-components";
import chatUser from "../assets/chatUser.png";
export default function Welcome() {
  const [userName, setUserName] = useState("");
  useEffect(async () => {
    setUserName(
      await JSON.parse(
        localStorage.getItem(process.env.REACT_APP_LOCALHOST_KEY)
      ).username
    );
  }, []);
  return (
    <Container>
      <img src={chatUser} alt="chatUser" />
      <h1>
        Welcome, <span>{userName}!</span>
      </h1>
      <p>Please select a chat to Start messaging.</p>
    </Container>
  );
}

const Container = styled.div`
  display: flex;
  justify-content: center;
  align-items: center;
  color: #000;
  background: #f7f2f8;
  border-radius: 0px 12px 12px 0px;
  flex-direction: column;
  img {
    height: 14rem;
  }
  h1 {
    font-weight: 400;
  }
  span {
    color: #cc8cff;
  }
`;
