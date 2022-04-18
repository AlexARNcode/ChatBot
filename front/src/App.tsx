import './App.css';
import axios from "axios";
import { useState } from "react";

function App() {

const [answer, setAnswer] = useState(
  "Bonjour, je suis le Bot. Posez-moi des questions et j'essayerai d'y répondre !"
  );
const [userQuestion, setUserQuestion] = useState<string>();

async function getAnswer(userQuestion: string) {
  setAnswer("");
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
    <div className="text-center mt-3">
        {userQuestion && <p>{ userQuestion }</p>}
        {answer && <p>Bot : {JSON.stringify(answer).replace(/["']/g, "")}</p>}
      </div>
    
      <div className="d-flex justify-content-center">
        <input 
        type="text"
        className="form-control w-25"
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
      </div>
  </>
);
}

export default App;
