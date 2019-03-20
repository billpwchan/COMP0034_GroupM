const puppeteer = require('puppeteer');
const faker = require('faker');
const HEADLESS = true;
describe('Test UberKidz Registration Page', () => {
    jest.setTimeout(30000);
    var browser, page;
    var url = 'http://localhost/registration.php';
    let width = 1920;
    let height = 1080;
    beforeEach(async () => {
        browser = await puppeteer.launch({
            headless: HEADLESS
        });
        page = await browser.newPage();
        await page.setViewport({
            width,
            height
        });
    })
    afterEach(() => {
        browser.close()
    });
    test('Title == Registration', async () => {
        await page.goto(url);
        const title = await page.title();
        expect(title).toBe("Registration");
    });
    test("Navbar Exist", async () => {
        await page.goto(url);
        const navbar = await page.$eval(".navbar", el => (el ? true : false));
        expect(navbar).toBe(true);
    });
    test("No User Type Selection", async () => {
        await page.goto(url);

        const NEXT1_SELECTOR = '#fieldset1 > input.next1.action-button';
        await page.click(NEXT1_SELECTOR);

        const sa2 = await page.$eval("#swal2-content", el => (el ? true : false));
        expect(sa2).toBe(true);

        const sa2Content = await page.$eval("#swal2-content", el => el.innerHTML);
        expect(sa2Content.trim()).toBe('It is necessary to indicate which type of user you registered.');
    });
    test("Wrong Password Format", async () => {
        await page.goto(url);

        await page.click('#fieldset1 > div.dropdown.bootstrap-select.userInput > button > div');
        await page.waitForSelector('#fieldset1 > div.dropdown.bootstrap-select.userInput.show > div > div > ul > li:nth-child(1) > a');
        await page.click('#fieldset1 > div.dropdown.bootstrap-select.userInput.show > div > div > ul > li:nth-child(1) > a');

        const NEXT1_SELECTOR = '#fieldset1 > input.next1.action-button';
        await page.click(NEXT1_SELECTOR);

        const sa2 = await page.$eval("#swal2-content", el => (el ? true : false));
        expect(sa2).toBe(true);

        const sa2Content = await page.$eval("#swal2-content", el => el.innerHTML);
        expect(sa2Content.trim()).toBe('Has to be a combination of Number, UpperCase Letter, LowerCase Letter.');
    });
    test("Input Invalid Email", async () => {
        await page.goto(url);

        await page.click('#email');
        await page.keyboard.type('abc');

        await page.click('#pass');
        await page.keyboard.type('12345678Aa*');

        await page.click('#cpass');
        await page.keyboard.type('12345678Aa*');

        await page.click('#fieldset1 > div.dropdown.bootstrap-select.userInput > button > div');
        await page.waitForSelector('#fieldset1 > div.dropdown.bootstrap-select.userInput.show > div > div > ul > li:nth-child(1) > a');
        await page.click('#fieldset1 > div.dropdown.bootstrap-select.userInput.show > div > div > ul > li:nth-child(1) > a');

        const NEXT1_SELECTOR = '#fieldset1 > input.next1.action-button';
        await page.click(NEXT1_SELECTOR);

        const sa2 = await page.$eval("#swal2-content", el => (el ? true : false));
        expect(sa2).toBe(true);

        const sa2Content = await page.$eval("#swal2-content", el => el.innerHTML);
        expect(sa2Content.trim()).toBe('Has to be format like abc@d.efg');
    });
})