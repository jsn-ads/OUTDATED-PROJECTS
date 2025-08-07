
import { useState } from 'react';
import { SafeAreaView, StyleSheet, StatusBar, Text, View, Button } from 'react-native';

export default function App() {

//STATES
const [ingredientes, setIngredientes] = useState<string[]>([
  'item A',
  'item B',
  'item C',
  'item D'

]);

//FUNCTIONS

const handleNewItem = () => {

  let prevList = [... ingredientes];
  prevList.push('item New');
  setIngredientes(prevList);

}

  
//APP
  return (
    <SafeAreaView>
        <StatusBar barStyle="light-content" backgroundColor='#FFF' />

        <Text style={styles.title}>TWO-FIFTEEN-APP</Text>
        {ingredientes.map((item, index) =>(
          <Text style={styles.item} key={index}>{item}</Text>
        ))}

        <Button title='Adicionar' onPress={handleNewItem}></Button>

    </SafeAreaView>
  );
}

//CSS

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'center',
  },
  title:{
    fontSize: 18,
    color: '#FF0000',
    textAlign: 'center'
  },
  item:{
    fontSize: 15,
    marginLeft: 5
  }
});
