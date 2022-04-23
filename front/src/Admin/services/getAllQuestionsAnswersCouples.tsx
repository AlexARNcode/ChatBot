import axios from "axios";

export async function getAllQuestionsAnswersCouples(setAllQuestionsAndAnswers: (arg0: any) => void, setIsLoading: (arg0: boolean) => void) {
    try {
        const { data, status } = await axios.get(
          'http://127.0.0.1:8000/questions-answers-couples',
          {
            headers: {
              Accept: 'application/json',
            },
          },
        );
    
        if (status === 200) {
            setAllQuestionsAndAnswers(data);
            setIsLoading(false);
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