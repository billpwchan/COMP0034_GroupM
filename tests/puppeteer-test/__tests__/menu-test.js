const puppeteer = require('puppeteer');
const HEADLESS = true;
describe('Test UberKidz Venue', () => {
    var browser, page;
    var url = 'http://localhost/menus.php'
    let width = 1920;
    let height = 1080;
    beforeEach(async () => {
        browser = await puppeteer.launch({
            headless: HEADLESS
        });
        page = await browser.newPage();
        await page.setViewport({width, height});
    })
    afterEach(() => {
        browser.close()
    });
    test('Title == Venues', async () => {
        await page.goto(url);
        const title = await page.title();
        expect(title).toBe("Menus");
    });
    test("Navbar Exist", async () => {
        await page.goto(url);
        const navbar = await page.$eval(".navbar", el => (el ? true : false));
        expect(navbar).toBe(true);
    });
})