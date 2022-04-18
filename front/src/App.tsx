import './App.css';
import axios from "axios";
import { useState } from "react";

function App() {

const [answer, setAnswer] = useState();
const [userQuestion, setUserQuestion] = useState<string>();

async function getAnswer(userQuestion: string) {
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
    {userQuestion && <p>{ userQuestion }</p>}
    {answer && <p>Réponse : {JSON.stringify(answer).replace(/["']/g, "")}</p>}

    <input type="text"
    onKeyPress={
      (e) => { 
        if (e.key === 'Enter') {
          e.preventDefault();
          setUserQuestion((e.target as HTMLInputElement).value);
          getAnswer((e.target as HTMLInputElement).value); 
        } 
      } 
    }
    />
  </>
);
}

export default App;
