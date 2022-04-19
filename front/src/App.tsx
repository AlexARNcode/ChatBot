import './App.css';
import axios from "axios";
import { useState } from "react";
import UserOutput from './Components/UserOutput';
import UserInput from './Components/UserInput';

function App() {

const [answer, setAnswer] = useState(
  "Bonjour, je suis le Bot. Posez-moi des questions et j'essayerai d'y répondre !"
  );
const [userQuestion, setUserQuestion] = useState<string>();

async function getAnswer(userQuestion: string) {
  setAnswer("");
  try {
    const { data, status } = await axios.get(
      `http://127.0.0.1:8000/answer?userQuestion=${userQuestion}`,
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
  <UserOutput userQuestion={ userQuestion } answer={ answer } />
  
  <UserInput setUserQuestion={ setUserQuestion } getAnswer={ getAnswer } />
  </>
);
}

export default App;
