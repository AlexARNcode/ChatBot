import React from 'react';
import logo from './logo.svg';
import './App.css';
import axios from "axios";
import { useState } from "react";
import { getValue } from '@testing-library/user-event/dist/utils';

function App() {

const [answer, setAnswer] = useState();

const userQuestion = "Qui a inventé la Mongolfière ?";

React.useEffect(() => {
  getAnswer();
}, []);

async function getAnswer() {
  try {
    const { data, status } = await axios.get(
      `http://127.0.0.1:8000/getAnswer?userQuestion=${userQuestion}`,
      {
        headers: {
          Accept: 'application/json',
        },
      },
    );

    if (status === 200) {
      setAnswer(data); 
    }

  } catch (error) {
    if (axios.isAxiosError(error)) {
      console.log('error message: ', error.message);
      return error.message;
    } else {
      console.log('unexpected error: ', error);
      return 'An unexpected error occurred';
    }
  }
}  

return (
  <>
     {answer && <p>OK</p>}
  </>

);
}

export default App;
